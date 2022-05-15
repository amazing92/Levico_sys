import Vue from 'vue'
import Router from 'vue-router'

// Containers
const TheContainer = () => import('@/containers/TheContainer')

// Views
const Dashboard = () => import('@/views/Dashboard')

const Colors = () => import('@/views/theme/Colors')
const Typography = () => import('@/views/theme/Typography')

const Charts = () => import('@/views/charts/Charts')
const Widgets = () => import('@/views/widgets/Widgets')

// Views - Components
const Cards = () => import('@/views/base/Cards')
const Forms = () => import('@/views/base/Forms')
const Switches = () => import('@/views/base/Switches')
const Tables = () => import('@/views/base/Tables')
const Tabs = () => import('@/views/base/Tabs')
const Breadcrumbs = () => import('@/views/base/Breadcrumbs')
const Carousels = () => import('@/views/base/Carousels')
const Collapses = () => import('@/views/base/Collapses')
const Jumbotrons = () => import('@/views/base/Jumbotrons')
const ListGroups = () => import('@/views/base/ListGroups')
const Navs = () => import('@/views/base/Navs')
const Navbars = () => import('@/views/base/Navbars')
const Paginations = () => import('@/views/base/Paginations')
const Popovers = () => import('@/views/base/Popovers')
const ProgressBars = () => import('@/views/base/ProgressBars')
const Tooltips = () => import('@/views/base/Tooltips')

// Views - Buttons
const StandardButtons = () => import('@/views/buttons/StandardButtons')
const ButtonGroups = () => import('@/views/buttons/ButtonGroups')
const Dropdowns = () => import('@/views/buttons/Dropdowns')
const BrandButtons = () => import('@/views/buttons/BrandButtons')

// Views - Icons
const CoreUIIcons = () => import('@/views/icons/CoreUIIcons')
const Brands = () => import('@/views/icons/Brands')
const Flags = () => import('@/views/icons/Flags')

// Views - Notifications
const Alerts = () => import('@/views/notifications/Alerts')
const Badges = () => import('@/views/notifications/Badges')
const Modals = () => import('@/views/notifications/Modals')

// Views - Pages
const Page404 = () => import('@/views/pages/Page404')
const Page500 = () => import('@/views/pages/Page500')
const Login = () => import('@/views/pages/Login')
const Register = () => import('@/views/pages/Register')

// Users
const Users = () => import('@/views/users/Users')
const User = () => import('@/views/users/User')
const EditUser = () => import('@/views/users/EditUser')

//Notes
const Notes = () => import('@/views/notes/Notes')
const Note = () => import('@/views/notes/Note')
const EditNote = () => import('@/views/notes/EditNote')
const CreateNote = () => import('@/views/notes/CreateNote')

//Roles
const Roles = () => import('@/views/roles/Roles')
const Role = () => import('@/views/roles/Role')
const EditRole = () => import('@/views/roles/EditRole')
const CreateRole = () => import('@/views/roles/CreateRole')

//Bread
const Breads = () => import('@/views/bread/Breads')
const Bread = () => import('@/views/bread/Bread')
const EditBread = () => import('@/views/bread/EditBread')
const CreateBread = () => import('@/views/bread/CreateBread')
const DeleteBread = () => import('@/views/bread/DeleteBread')

//Resources
const Resources = () => import('@/views/resources/Resources')
const CreateResource = () => import('@/views/resources/CreateResources')
const Resource = () => import('@/views/resources/Resource')
const EditResource = () => import('@/views/resources/EditResource')
const DeleteResource = () => import('@/views/resources/DeleteResource')

//Email
const Emails        = () => import('@/views/email/Emails')
const CreateEmail   = () => import('@/views/email/CreateEmail')
const EditEmail     = () => import('@/views/email/EditEmail')
const ShowEmail     = () => import('@/views/email/ShowEmail')
const SendEmail     = () => import('@/views/email/SendEmail')

const Menus       = () => import('@/views/menu/MenuIndex')
const CreateMenu  = () => import('@/views/menu/CreateMenu')
const EditMenu    = () => import('@/views/menu/EditMenu')
const DeleteMenu  = () => import('@/views/menu/DeleteMenu')

const MenuElements = () => import('@/views/menuElements/ElementsIndex')
const CreateMenuElement = () => import('@/views/menuElements/CreateMenuElement')
const EditMenuElement = () => import('@/views/menuElements/EditMenuElement')
const ShowMenuElement = () => import('@/views/menuElements/ShowMenuElement')
const DeleteMenuElement = () => import('@/views/menuElements/DeleteMenuElement')

const Media = () => import('@/views/media/Media')


Vue.use(Router)

let router = new Router({
  mode: 'hash', // https://router.vuejs.org/api/#mode
  linkActiveClass: 'active',
  scrollBehavior: () => ({ y: 0 }),
  routes: configRoutes()
})


router.beforeEach((to, from, next) => {
  let roles = localStorage.getItem("roles");
  console.log("roles",roles)
  if(roles != null){
    roles = roles.split(',')
  }
  if(to.matched.some(record => record.meta.requiresAdmin)) {
    if(roles != null && roles.indexOf('admin') >= 0 ){
      next()
    }else{
      next({
        path: '/login',
        params: { nextUrl: to.fullPath }
      })
    }
  }else if(to.matched.some(record => record.meta.requiresUser)) {
    if(roles != null && roles.indexOf('user') >= 0 ){
      next()
    }else{
      next({
        path: '/login',
        params: { nextUrl: to.fullPath }
      })
    }
  }else{
    next()
  }
})

export default router

function configRoutes () {
  return [
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: TheContainer,
      meta: { requiresAuth: true },
      children: [
        {
          path: 'media',
          name: 'Media',
          component: Media,
          meta:{
            requiresAdmin: true
          }
        },
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: 'colors',
          name: 'Colors',
          component: Colors,
          meta:{
            requiresUser: true
          }
        },
        {
          path: 'typography',
          name: 'Typography',
          component: Typography,
          meta:{
            requiresUser: true
          }
        },
        {
          path: 'charts',
          name: 'Charts',
          component: Charts,
          meta:{
            requiresUser: true
          }
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets,
          meta:{
            requiresUser: true
          }
        },
        {
          path: 'menu',
          meta: { label: 'Menu'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Menus,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: 'create',
              name: 'CreateMenu',
              component: CreateMenu,
              meta:{
                label: 'Create Menu',
                requiresAdmin: true
              }
            },
            {
              path: ':id/edit',
              name: 'EditMenu',
              component: EditMenu,
              meta:{
                label: 'Edit Menu',
                requiresAdmin: true
              }
            },
            {
              path: ':id/delete',
              name: 'DeleteMenu',
              component: DeleteMenu,
              meta:{
                label: 'Delete Menu',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'menuelement',
          meta: { label: 'MenuElement'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: ':menu/menuelement',
              component: MenuElements,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: ':menu/menuelement/create',
              name: 'Create Menu Element',
              component: CreateMenuElement,
              meta:{
                label: 'Create Menu Element',
                requiresAdmin: true
              }
            },
            {
              path: ':menu/menuelement/:id',
              name: 'Menu Element',
              component: ShowMenuElement,
              meta:{
                label: 'Menu Element Details',
                requiresAdmin: true
              }
            },
            {
              path: ':menu/menuelement/:id/edit',
              name: 'Edit Menu Element',
              component: EditMenuElement,
              meta:{
                label: 'Edit Menu Element',
                requiresAdmin: true
              }
            },
            {
              path: ':menu/menuelement/:id/delete',
              name: 'Delete Menu Element',
              component: DeleteMenuElement,
              meta:{
                label: 'Delete Menu Element',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'users',
          meta: { label: 'Users'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Users,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: ':id',
              name: 'User',
              component: User,
              meta:{
                label: 'User Details',
                requiresAdmin: true
              }
            },
            {
              path: ':id/edit',
              name: 'Edit User',
              component: EditUser,
              meta:{
                label: 'Edit User',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'notes',
          meta: { label: 'Notes'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Notes,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'create',
              name: 'Create Note',
              component: CreateNote,
              meta:{
                label: 'Create Note',
                requiresUser: true
              }
            },
            {
              path: ':id',
              name: 'Note',
              component: Note,
              meta:{
                label: 'Note Details',
                requiresUser: true
              }
            },
            {
              path: ':id/edit',
              name: 'Edit Note',
              component: EditNote,
              meta:{
                label: 'Edit Note',
                requiresUser: true
              }
            },
          ]
        },
        {
          path: 'roles',
          meta: { label: 'Roles'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Roles,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: 'create',
              name: 'Create Role',
              component: CreateRole,
              meta:{
                label: 'Create Role',
                requiresAdmin: true
              }
            },
            {
              path: ':id',
              name: 'Role',
              component: Role,
              meta:{
                label: 'Role Details',
                requiresAdmin: true
              }
            },
            {
              path: ':id/edit',
              name: 'Edit Role',
              component: EditRole,
              meta:{
                label: 'Edit Role',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'bread',
          meta: { label: 'Bread'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Breads,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: 'create',
              name: 'CreateBread',
              component: CreateBread,
              meta:{
                label: 'Create Bread',
                requiresAdmin: true
              }
            },
            {
              path: ':id',
              name: 'Bread',
              component: Bread,
              meta:{
                label: 'Bread Details',
                requiresAdmin: true
              }
            },
            {
              path: ':id/edit',
              name: 'Edit Bread',
              component: EditBread,
              meta:{
                label: 'Edit Bread',
                requiresAdmin: true
              }
            },
            {
              path: ':id/delete',
              name: 'Delete Bread',
              component: DeleteBread,
              meta:{
                label: 'Delete Bread',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'email',
          meta: { label: 'Emails'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Emails,
              meta:{
                requiresAdmin: true
              }
            },
            {
              path: 'create',
              name: 'Create Email Template',
              component: CreateEmail,
              meta:{
                label: 'Create Email Template',
                requiresAdmin: true
              }
            },
            {
              path: ':id',
              name: 'Show Email Tempalte',
              component: ShowEmail,
              meta:{
                label: 'Show Email Template',
                requiresAdmin: true
              }
            },
            {
              path: ':id/edit',
              name: 'Edit Email Template',
              component: EditEmail,
              meta:{
                label: 'Edit Email Tempalate',
                requiresAdmin: true
              }
            },
            {
              path: ':id/sendEmail',
              name: 'Send Email',
              component: SendEmail,
              meta:{
                label: 'Send Email',
                requiresAdmin: true
              }
            },
          ]
        },
        {
          path: 'resource',
          meta: { label: 'Resources'},
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: ':bread/resource',
              component: Resources,
            },
            {
              path: ':bread/resource/create',
              meta: { label: 'Create Resource' },
              name: 'CreateResource',
              component: CreateResource
            },
            {
              path: ':bread/resource/:id',
              meta: { label: 'Resource Details'},
              name: 'Resource',
              component: Resource,
            },
            {
              path: ':bread/resource/:id/edit',
              meta: { label: 'Edit Resource' },
              name: 'Edit Resource',
              component: EditResource
            },
            {
              path: ':bread/resource/:id/delete',
              meta: { label: 'Delete Resource' },
              name: 'Delete Resource',
              component: DeleteResource
            },
          ]
        },
        {
          path: 'base',
          redirect: '/base/cards',
          name: 'Base',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'cards',
              name: 'Cards',
              component: Cards,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'forms',
              name: 'Forms',
              component: Forms,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'switches',
              name: 'Switches',
              component: Switches,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'tables',
              name: 'Tables',
              component: Tables,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'tabs',
              name: 'Tabs',
              component: Tabs,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'breadcrumb',
              name: 'Breadcrumb',
              component: Breadcrumbs,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'carousel',
              name: 'Carousel',
              component: Carousels,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'collapse',
              name: 'Collapse',
              component: Collapses,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'jumbotron',
              name: 'Jumbotron',
              component: Jumbotrons,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'list-group',
              name: 'List Group',
              component: ListGroups,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'navs',
              name: 'Navs',
              component: Navs,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'navbars',
              name: 'Navbars',
              component: Navbars,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'pagination',
              name: 'Pagination',
              component: Paginations,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'popovers',
              name: 'Popovers',
              component: Popovers,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'progress',
              name: 'Progress',
              component: ProgressBars,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'tooltips',
              name: 'Tooltips',
              component: Tooltips,
              meta:{
                requiresUser: true
              }
            }
          ]
        },
        {
          path: 'buttons',
          redirect: '/buttons/standard-buttons',
          name: 'Buttons',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'buttons',
              name: 'Standard Buttons',
              component: StandardButtons,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'button-group',
              name: 'Button Group',
              component: ButtonGroups,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'dropdowns',
              name: 'Dropdowns',
              component: Dropdowns,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'brand-buttons',
              name: 'Brand Buttons',
              component: BrandButtons,
              meta:{
                requiresUser: true
              }
            }
          ]
        },
        {
          path: 'icon',
          redirect: '/icons/coreui-icons',
          name: 'CoreUI Icons',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'coreui-icons',
              name: 'Icons library',
              component: CoreUIIcons,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'brands',
              name: 'Brands',
              component: Brands,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'flags',
              name: 'Flags',
              component: Flags,
              meta:{
                requiresUser: true
              }
            }
          ]
        },
        {
          path: 'notifications',
          redirect: '/notifications/alerts',
          name: 'Notifications',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'alerts',
              name: 'Alerts',
              component: Alerts,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'badge',
              name: 'Badge',
              component: Badges,
              meta:{
                requiresUser: true
              }
            },
            {
              path: 'modals',
              name: 'Modals',
              component: Modals,
              meta:{
                requiresUser: true
              }
            }
          ]
        }
      ]
    },
    {
      path: '/pages',
      redirect: '/pages/404',
      name: 'Pages',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },
      ]
    },
    {
      path: '/',
      redirect: '/login',
      name: 'Auth',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: 'login',
          name: 'Login',
          component: Login
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        },
      ]
    },
    {
      path: '*',
      name: '404',
      component: Page404
    }
  ]
}
