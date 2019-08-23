Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'forms',
            path: '/forms',
            component: require('./components/Tool'),
            props: {resourceName: 'forms'}
        },
    ])
})
