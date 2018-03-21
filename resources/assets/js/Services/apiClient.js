let axios = require('axios');

let client = {

  saveDocument: function (data, success, error) {
    axios.post('/legal/api/documents', data)
      .then(response => {
        success(response);
      })
      .catch(response => {
        error(response);
      });
  },

  fetchDocument: function (type, success, error) {
    axios.get('/legal/api/documents/' + type)
      .then(response => {
        success(response);
      })
      .catch(response => {
        error(response);
    });
  }

};

module.exports = client;