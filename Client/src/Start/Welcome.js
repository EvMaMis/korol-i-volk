import {
  Route,
  Routes,
  Link,
  NavLink
} from "react-router-dom";

function Welcome() {
  return (
    <div className="Container__welcome">
        <div className="Welcome__title">
            <h1>Король и Волк</h1>
            <img href="#" alt="Welcome"></img>
        </div>
        <div className="Welcome__descrip">
          <p>
            Описание
          </p>
        </div>
        <div className="Box__btn">
        <NavLink to="/Log-in"  className="General__btn">
          <button>Начать Приключение</button>
        </NavLink>
        <NavLink to="/Sign-in"  className="General__btn">
          <button>Войти</button>
        </NavLink>
        </div>
    </div>
  );
}

export default Welcome;
