//------------------------------------------------------------------------------
//
// Husky Configuration, https://github.com/typicode/husky
//
//------------------------------------------------------------------------------

module.exports = {
  hooks: {
    "pre-commit": "./bin/format && ./bin/test"
  }
};
