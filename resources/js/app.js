
require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('message', require('./components/Message.vue').default);


const app = new Vue({
    el: '#app',
    data:{
        message: '',
        typing:0,
        chat: {
            message:[]
        }
    },
    methods:{
        send(){
            if(this.message){
                this.chat.message.push(this.message);
                console.log(this.message);
                this.message='';
            }

        }
    }
});
