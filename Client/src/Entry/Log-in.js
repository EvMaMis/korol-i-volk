import {
    Route,
    Routes,
    Link,
    NavLink
  } from "react-router-dom";
  
  function Log_in() {
    return (
      <div className="Log__container">
          <h1>Регистрация</h1>
          <form action="" method="">
            <div className="Input__text">
                <label>Login</label>
                <input type="text"></input>
            </div>
            <div className="Input__text">
                <label>Email</label>
                <input type="text"></input>
            </div>
            <div className="Input__text">
                <label>Пароль</label>
                <input type="text"></input>
            </div>
            <div className="Input__text Last">
                <label>Подтверждение пароля</label>
                <input type="text"></input>
            </div>
            <div className="Box__btn">
                <button>Подтвердить</button>
            </div>
          </form>
      </div>
    );
  }
  
  export default Log_in;
  