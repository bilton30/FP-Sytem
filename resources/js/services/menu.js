export default  [
    {
        name: "Dashboard",
        icon: "dashboard",
        redirect:  "home",
        roles: "home-index"
    },

    {
        name: "Admin",
        icon: "settings",
        color: 'text-red',
        redirect: { name: "settings" },
        roles: "admin-users-index,admin-roles-index",
        childrens: [{
                name: "Users",
                icon: "group",
                color: 'text-teal',
                redirect: "users" ,
                roles: "admin-users-index"
            },
            {
                name: "Roles",
                icon: "badge",
                color: 'text-orange',
                redirect: "roles" ,
                roles: "admin-roles-index"
            }
        ]
    }
];
