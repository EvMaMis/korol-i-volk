import './App.css';
import Welcome from './Start/Welcome.js';
import Log_in from './Entry/Log-in.js';
import {
  Route,
  Routes,
  Link,
  NavLink
} from "react-router-dom";
function App() {
  return (
    <div className="App">
    <Routes>
      <Route index element={<Welcome/>}/>
      <Route path="/Log-in" element={<Log_in/>}/>
    </Routes>
    </div>
  );
}

export default App;
