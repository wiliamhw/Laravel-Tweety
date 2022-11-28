module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            borderRadius: {
                lg: "1.25rem",
            },
        },
    },
    variants: {
        boxShadow: ["hover"],
    },
    plugins: [require("@tailwindcss/ui")],
};
