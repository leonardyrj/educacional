export default[
  {
    name: 'class_information.list',
    path: '/classes',
    component: require('./components/teacher/TeacherClassInformationList.vue')
  },
  {
    name: 'login',
    path: '/login',
    'component': require('./components/Login.vue')
  },
  {path: '*', redirect: '/login'}
];
