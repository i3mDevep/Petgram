import React from 'react'
import { Form, Error, Changeform } from './styles'

export const loginUser = ( onSubmit, onClick, email, password, error, disable  ) => {

    const mode = true
    const handleSubmit = (e) => {
      e.preventDefault()
      onSubmit({ email: email.value, password: password.value, mode })
    }
    return (
      <Form disabled={disable} onSubmit={ handleSubmit }>
        <h1>Sing in</h1>
        <input disabled={disable} placeholder='Email' required={true} type="email" {...email} />
        <input disabled={disable} placeholder='Password' required={true} type="password" {...password}/>
        <button disabled={disable} >Sing in</button>
        <label disabled={disable} >are you not registered?
          <Changeform onClick={ onClick }> Sing up </Changeform>
        </label>
        { error && <Error>{ error }</Error> }
      </Form>
    )
  }