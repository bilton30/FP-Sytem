export default  [
    {
        name: "Dashboard",
        icon: "dashboard",
        redirect: { name: "home" },
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
                redirect: { name: "users" },
                roles: "admin-users-index"
            },
            {
                name: "Roles",
                icon: "badge",
                color: 'text-orange',
                redirect: { name: "roles" },
                roles: "admin-roles-index"
            }
        ]
    }
];
