module.exports = {
    lang: 'en-US',
    title: 'Hello, VuePress!',
    description: 'This is my first VuePress site',
    dest: 'dist/docs',
    title: 'My Project Docs',
    base: '/docs/',
    port: 3000,
    plugins: [],
    devServer: {
        before: app => {
            // point `/docs` to VuePress dev server, configured above
            app.get('/docs', (req, res) => {
                res.redirect('http://localhost:3000/docs')
            })
        }
    },
   
    themeConfig: {
        logo: 'https://vuejs.org/images/logo.png',
        repo: 'truelineinfotech/ci4-starterkit',
      
     
        // if your docs are not at the root of the repo:
        docsDir: 'docs',
        // if your docs are in a specific branch (defaults to 'master'):
        docsBranch: 'master',
        displayAllHeaders: true, // Default: false
       
      
        locales: {
            // The key is the path for the locale to be nested under.
            // As a special case, the default locale can use '/' as its path.
            '/': {
                lang: 'en-US', // this will be set as the lang attribute on <html>
                title: 'VuePress',
                description: 'Vue-powered Static Site Generator'
            },
        },
        navbar: [
            // nested group - max depth is 2
            {
                text: 'Group',
                children: [{
                        text: 'SubGroup',
                        children: ['/group/sub/foo.md', '/group/sub/bar.md'],
                    },
                ],
            },
            // control when should the item be active
            {
                text: 'Group 2',
                children: [{
                        text: 'Always active',
                        link: '/',
                        // this item will always be active
                        activeMatch: '/',
                    }, {
                        text: 'Active on /foo/',
                        link: '/not-foo/',
                        // this item will be active when current route path starts with /foo/
                        // regular expression is supported
                        activeMatch: '^/foo/',
                    },
                ],
            },
        ],
    }
}