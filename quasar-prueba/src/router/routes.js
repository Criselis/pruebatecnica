
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('src/pages/ListComponent.vue') },
      { path: '/list', component: () => import('src/pages/ListComponent.vue') },
      { path: '/listProductVariants', component: () => import('src/pages/ListProductVariants.vue') },
      { path: '/addProduct', component: () => import('src/pages/AddProduct.vue') },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
