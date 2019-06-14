require('./bootstrap');

window.Vue = require('vue');

import Toaster from 'v-toaster';
import 'v-toaster/dist/v-toaster.css';
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000});

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('message', require('./components/Message.vue').default);


let app;
app = new Vue({
    el: '#app',
    data: {
        message: '',
        typing: '',
        users: 0,
        chat: {
            message: [],
            user: [],
            color: [],
            timing: []
        }
    },
    watch: {
        message() {
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }


    },
    methods: {
        send: function () {
            if (this.message) {
                this.chat.message.push(this.message);
                this.chat.user.push('you');
                this.chat.color.push('success');
                this.chat.timing.push();
                axios.post('/send', {
                    message: this.message,
                    user: 'you'
                })
                    .then(response => {
                        console.log(response, '32');
                        this.message = '';
                    })
                    .catch(error => {
                        console.log(error);
                    })

            }

        }
    },
    mounted: function () {
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                console.log(e, '47');
                this.chat.message.push(e.message);
                this.chat.user.push(e.user.name);
                this.chat.color.push('warning');
            }),
            Echo.private('chat')
                .listenForWhisper('typing', (e) => {
                    if (e.name) {
                        this.typing = 'typing...';
                    } else {
                        this.typing = '';
                    }
                });

            Echo.join(`chat`)
                .here((users) => {
                    console.log(users);
                    this.users = users.length;
                })
                .joining((user) => {
                    ++this.users;
                    // console.log(user.name+' joined chat');
                    this.$toaster.success(user.name+' has joined chat');

                })
                .leaving((user) => {
                    // console.log(user.name+' leaved chat');
                    --this.users;
                    this.$toaster.warning(user.name+' has leaved chat');

                });


    }
});
