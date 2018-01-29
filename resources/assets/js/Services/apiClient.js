let axios = require('axios');

let client = {

  saveDocument: function (data, success, error) {
    axios.post('/legal/api/documents', data)
      .then(response => {
        success(response);
      })
      .catch(error => {
        error(error);
      });
  },

  fetchDocument: function (type, success, error) {
    axios.get('/legal/api/documents/' + type)
      .then(response => {
        success(response);
      })
      .catch(error => {
        error(error);
    });
  }

};

module.exports = client;