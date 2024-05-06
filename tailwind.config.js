const options = require("./config.js"); //options from config.js

const allPlugins = {
  typography: require("@tailwindcss/typography"),
  forms: require("@tailwindcss/forms"),
  containerQueries: require("@tailwindcss/container-queries"),
};

const plugins = Object.keys(allPlugins)
  .filter((k) => options.plugins[k])
  .map((k) => {
    if (k in options.plugins && options.plugins[k]) {
      return allPlugins[k];
    }
  });

/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: ["./*.php", "./widgets/*.php"],
  darkMode: "class",
  theme: {
    container: {
      center: true,
      screens: {
        sm: '100%',
        md: '100%',
        lg: '1024px',
        xl: '1280px',
      },
    },
    extend: {
      colors: {
        primary: options.colors.primary,
        secondary: options.colors.secondary,
        accent: options.colors.accent,
        dark: options.colors.dark,
        light: options.colors.light,
        gray: options.colors.gray,
      },
    },
  },
  plugins: plugins,
};