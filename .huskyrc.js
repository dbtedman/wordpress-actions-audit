//------------------------------------------------------------------------------
//
// Husky Configuration, https://github.com/typicode/husky
//
//------------------------------------------------------------------------------

module.exports = {
  hooks: {
    "pre-commit":
      "npm run format && composer run-script format && composer run-script test"
  }
};
