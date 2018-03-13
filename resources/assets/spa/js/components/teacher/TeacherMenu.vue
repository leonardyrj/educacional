<template src="../templates/menu.html"></template>


<script type="text/javascript">
    import store from '../../store/store';
    import LogoutComponent from '../Logout.vue';

    export default {
        components:{
          'logout': LogoutComponent,
        },
        data(){
            return {
                menus: [
                    {name: "Minhas turmas", routeName: 'class_information.list'}
                ],
                brandRouteName: 'class_information.list'
            }
        },
        computed: {
            isAuth(){
                return store.state.auth.check;
            },
            user(){
                return store.state.auth.user;
            },
            username(){
                return this.isAuth?store.state.auth.user.name:null;
            },
            email(){
              return this.isAuth?store.state.auth.user.email:null;
            }
        }
    };
</script>
