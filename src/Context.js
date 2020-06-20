import React, { createContext, useState } from 'react'
const Context = createContext()

const Provider = ({ children }) => {
  const [isAuth,setIsAuth] = useState(() => {
    return window.localStorage.getItem('token')? true: false
  })

  const value = {
    isAuth,
    activateAuth: ( token ) => {
      window.localStorage.setItem('token',token)
      setIsAuth(true)
    }
  }
  return (
    <Context.Provider value= { value }>
      { children }
    </Context.Provider>
  )
}
export default {
  Provider,
  Consumer: Context.Consumer
}