import React from 'react';
// import './resources/styles/App.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import { StateProvider } from './store.js';
import StateWrapper from './StateWrapper';

const App = () => {
  return (
    <StateProvider>
      <StateWrapper />
    </StateProvider>
  );
}

export default App;
