import './bootstrap';
import '../css/app.css'; 
import axios from 'axios';
console.log('JS funcionando');

axios.get('/sanctum/csrf-cookie').then(response => {
  console.log('csrf-cookie: ', response);
});

axios.get('/users').then((response) => {
  console.log('users: ', response);
});