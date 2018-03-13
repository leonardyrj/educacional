import 'vue-resource';
import Vue from 'vue';
import SPA_CONFIG from './spaConfig';

Vue.http.options.root = SPA_CONFIG.API_URL;

export class Jwt{
  static accessToken(username, password){
      return Vue.http.post('access_token',{username,password});
  }

  static Logout(){
      return Vue.http.post('logout');
  }
}

export{

};
