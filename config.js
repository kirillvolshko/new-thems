const config = {
  tailwindjs: "./tailwind.config.js",
  port: 9050,
  purgecss: {
    content: ["src/**/*.{html,js,php}"],
    safelist: {
      standard: [/^pre/, /^code/],
      greedy: [/token.*/],
    },
  },
  imagemin: {
    png: [0.7, 0.7], // range between min (0) and max (1) as quality - 70% with current values for png images,
    jpeg: 70, // % of compression for jpg, jpeg images
  },
};

// tailwind plugins
const plugins = {
  typography: true,
  forms: true,
  containerQueries: true,
};

// base folder paths
const basePaths = ["assets"];

// folder assets paths
const folders = ["scss", "js", "img", "fonts", "third-party"];

const paths = {
  root: "./",
};

// colors
const colors = {
  primary: "#141C24",
  secondary: "#00ff00",
  accent: "#0000ff",
  dark: "#141C24",
  light: "#ffffff", // color for text and icons on dark background
  gray: {
    100: "#E5E5E5", // border color
    200: "#F9F9F9", // bg color
    300: "#9A9A9A", // main text color
    400: "#808080", // secondary text color
    500: "#D9D9D9",
    600: "#718096",
    700: "#4a5568",
    800: "#2d3748",
    900: "#1a202c",
  },
};

basePaths.forEach((base) => {
  paths[base] = {
    base: `./${base}`,
  };
  folders.forEach((folderName) => {
    const toCamelCase = folderName.replace(/\b-([a-z])/g, (_, c) =>
      c.toUpperCase()
    );
    paths[base][toCamelCase] = `./${base}/${folderName}`;
  });
});

module.exports = {
  config,
  plugins,
  paths,
  colors,
};
