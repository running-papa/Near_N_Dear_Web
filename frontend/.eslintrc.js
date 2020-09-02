module.exports = {
  root: false,

  env: {
    "browser": true,
    "commonjs": true,
    "node": true,
    "es6": true
  },

  extends: [
    'vuetify',
  ],

  parserOptions: {
    parser: 'babel-eslint',
  },

  rules: {

  },

  overrides: [
    {
      files: [
        '**/__tests__/*.{j,t}s?(x)',
        '**/tests/unit/**/*.spec.{j,t}s?(x)',
      ],
      env: {
        jest: false,
      },
    },
  ],

}
