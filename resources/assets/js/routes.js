function requireAuth (to, from, next) {
    if (!localStorage.token) {
        next({
            path: '/login',
            query: { redirect: to.fullPath }
        })
    } else {
        next()
    }
}
export default[
    { path:'/',redirect:'/home'},
    { path: '/home', component: require('./pages/user/Home.vue'),name:'home', beforeEnter: requireAuth },
    { path: '/example', component: require('./components/Example.vue') },
    { path: '/login', component: require('./pages/user/Login.vue') },
    { path: '/employer', redirect:'/employer/Home'},
    {path: '/works',component: require('./pages/user/Works.vue')},
    {path: '/work/:id',component: require('./pages/user/WorkDetail.vue')},
    { path: '/employer/home', component: require('./pages/employer/Home.vue'),name:'employerHome', beforeEnter: requireAuth },
    { path: '/rightnavbar',component: require('./components/employer/RightNavbar.vue')},
    { path: '/employer/works/create',component: require('./pages/employer/CreateWork.vue'),beforeEnter: requireAuth}
];