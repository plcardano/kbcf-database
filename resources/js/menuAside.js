import {
  mdiAccountCircle,
  mdiMonitor
} from '@mdi/js'

export default [
  {
    route: 'dashboard',
    icon: mdiMonitor,
    label: 'Dashboard'
  },
  {
    label: 'Accounts',
    icon: mdiAccountCircle,
    menu: [
      {
        route: 'accounts.users.index',
        label: 'Users'
      },
      {
        route: 'dashboard',
        label: 'Roles'
      }
    ]
  },
  {
    label: 'Individual',
    icon: mdiAccountCircle,
    menu: [
      {
        route: 'individuals.index',
        label: 'Individual'
      },
    ]
  },
  // {
  //   // route: 'tables',
  //   label: 'Tables',
  //   icon: mdiTable
  // },
  // {
  //   // route: 'forms',
  //   label: 'Forms',
  //   icon: mdiSquareEditOutline
  // },
  // {
  //   // route: 'ui',
  //   label: 'UI',
  //   icon: mdiTelevisionGuide
  // },
  // {
  //   // route: 'responsive',
  //   label: 'Responsive',
  //   icon: mdiResponsive
  // },
  // {
  //   // route: '/',
  //   label: 'Styles',
  //   icon: mdiPalette
  // },
  // {
  //   // route: 'profile',
  //   label: 'Profile',
  //   icon: mdiAccountCircle
  // },
  // {
  //   // route: 'login',
  //   label: 'Login',
  //   icon: mdiLock
  // },
  // {
  //   // route: 'error',
  //   label: 'Error',
  //   icon: mdiAlertCircle
  // },
  // {
  //   label: 'Dropdown',
  //   icon: mdiViewList,
  //   menu: [
  //     {
  //       label: 'Item One'
  //     },
  //     {
  //       label: 'Item Two'
  //     }
  //   ]
  // },
  // {
  //   href: 'https://github.com/justboil/admin-one-vue-tailwind',
  //   label: 'GitHub',
  //   icon: mdiGithub,
  //   target: '_blank'
  // },
  // {
  //   href: 'https://github.com/justboil/admin-one-react-tailwind',
  //   label: 'React version',
  //   icon: mdiReact,
  //   target: '_blank'
  // }
]
