import React,{ Fragment, useState } from 'react'
import Context from '../Context'
import { UserForm } from '../components/UserForm'
import { RegisterUserMutation } from '../container/RegisterUserMutation'
import { LoginUserMutation } from '../container/LoginUserMutation'

export const NotRegisteredUser = () => {
  const [mode, setMode] = useState(true)
  return (
  <Context.Consumer>
    {
      ({ isAuth, activateAuth }) => {
        return (
          <Fragment>
            { mode
            ? <LoginUserMutation>
              {
                (toggleLogin,{ data, loading, error }) => {
                  const onSubmit = ({ email, password }) => {
                    const inputs = { email, password }
                    toggleLogin({variables: inputs })
                      .then(({data:{ loginUser }} = {}) => {
                        const { token } = loginUser
                        activateAuth( token )
                      })
                  }
                  const errorMsg = error && 'El usuario o contraseña son incorrectos.'
                  return (
                    <UserForm mode={true}
                      changeForm={()=>setMode(false)}
                      error={ errorMsg }
                      disable={ loading }
                      onSubmit={onSubmit}/>
                  )
                }
              }
            </LoginUserMutation>
            : <RegisterUserMutation>
              {
                (toggleRegister,{ data, loading, error }) => {
                  const onSubmit = ({ name, email, password, cellphone, phone, address }) => {
                    const inputs = { name, email, password, cellphone, phone, address }
                    toggleRegister({variables: inputs })
                      .then(({data: { addRegisterUser }} = { }) => {
                        const { token } = addRegisterUser
                        activateAuth( token )
                      })
                  }
                  const errorMsg = error && 'El usuario ya existe o hay algun problema.'
                  return  <UserForm
                    mode = {false}
                    changeForm = { () => setMode(true )}
                    error={ errorMsg }
                    disable={ loading }
                    onSubmit={ onSubmit }/>
                }
              }
            </RegisterUserMutation>
            }
          </Fragment>
        )
      }
    }
  </Context.Consumer>
  )
}

/*query LOGIN_USER ($email:String!,$password:String!){
  login(email:$email,password:$password){
    token
  }
}*/