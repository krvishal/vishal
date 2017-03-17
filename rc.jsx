
import ReactDOM from 'react-dom.js';
function formatName(user) {
  return user.firstName + ' ' + user.lastName;
}

const user = {
  firstName: 'Harper',
  lastName: 'Perez'
};

const elements = (
  <h1>
    Hello, {formatName(user)}!
  </h1>
);

ReactDOM.render(
  elements,
  document.getElementById('root')
);
