import React from 'react'
import { Router } from '@reach/router'
import { GlobalStyle } from './styles/GlobalStyles'
import { Logo } from './components/Logo'
import { Home } from './pages/Home'
import { Detail } from './pages/Detail'
import { NavBar } from './components/NavBar'
import { Favs } from './pages/Favs'
import { User } from './pages/User'
import { NotRegisteredUser } from './pages/NotRegisteredUser'
import Context from './Context'


// const UserLogged = ({ children }) => {
//   return children( { isAuth: false } )
// }

export const App = () => {
  const urlParams = new window.URLSearchParams
  ( window.location.search )
  const detailId = urlParams.get('detail')
  return (
    <div>
      <Logo/>
      <GlobalStyle />
      <Router>
        <Home path="/" />
        <Home path="/pet/:id" />
        <Detail path="/detail/:detailId"/>
      </Router>
      <Context.Consumer>
        {
          ({ isAuth }) => (
            isAuth
              ? <Router>
                  <Favs path="/favs"/>
                  <User path="/user"/>
              </Router>
              : <Router>
                  <NotRegisteredUser path="/favs"/>
                  <NotRegisteredUser path="/user"/>
                </Router>
          )
        }
        </Context.Consumer>
      <NavBar />
    </div>
  )
}
