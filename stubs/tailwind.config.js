const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            colors: {
                ...defaultTheme.colors,
                primary: defaultTheme.colors.blue,
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            minHeight: {
                ...defaultTheme.minHeight,
                ...defaultTheme.spacing
            },
            minWidth: {
                ...defaultTheme.minWidth,
                ...defaultTheme.spacing
            }
        },
    },
    variants: {},
    purge: {
        enabled: false,
        content: [
            './resources/**/*.js',
            './resources/**/*.php',
            './resources/**/*.vue',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [],
};
