import 'vue-resource';
import Vue from 'vue';
import ADMIN_CONFIG from './adminConfig';

Vue.http.headers.common['X-CSRF-Token'] = $('meta[name=csrf-token]').attr('content');

let ClassStudent = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/{class_information}/students/{student}`);

export {
    ClassStudent
}