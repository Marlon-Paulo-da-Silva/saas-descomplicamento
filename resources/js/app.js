import './bootstrap';
import '../css/app.css'; 
import axios from 'axios';
console.log('JS funcionando');

(async() => {

  await axios.get('/sanctum/csrf-cookie').then(response => {
    console.log('csrf-cookie: ', response);
  });
  
  await axios.post('/login').then(response => {
    console.log('login: ', response);
  });
  
  await axios.get('/users').then((response) => {
    console.log('users: ', response);
  });
  
  await axios.get('/api/user').then((response) => {
    console.log('api user: ', response);
  });

})()