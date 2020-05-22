const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            colors: theme => {
                const colors = defaultTheme.colors;
                return {
                    ...colors,
                    primary: colors.blue,
                }
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
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
