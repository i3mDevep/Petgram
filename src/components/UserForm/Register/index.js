import React from 'react'
import { Form, Error, Changeform } from './styles'

export const registerUser = (
    onSubmit, onClick, email, password, name, cellphone, phone, address, error, disable ) => {

  const mode = false
  const handleSubmit = (e) => {
    e.preventDefault()
    onSubmit({
      email: email.value, password: password.value,
      mode, name: name.value, cellphone:cellphone.value,
      phone: phone.value, address: address.value })
  }
  return (
    <Form onSubmit={ handleSubmit } disabled = {disable}>
      <h1>Sing up</h1>
      <input placeholder='Name' disabled = {disable} required={true} type="text" {...name}/>
      <input placeholder='Email' disabled = {disable} required={true} type="email" {...email} />
      <input placeholder='Password' disabled = {disable}  required={true} type="password" {...password}/>
      <input placeholder='Cellphone' disabled = {disable} required={true} type="tel" {...cellphone} />
      <input placeholder='Phone' disabled = {disable} required={false} type="tel" {...phone}/>
      <input placeholder='Address' disabled = {disable} required={true} type="text" {...address}/>
      <button disabled= {disable}>Sing up</button>
      <label disabled= {disable} >are you already registered?
        <Changeform onClick={ onClick }> Sing in </Changeform>
      </label>
     { error && <Error>{ error }</Error> }
    </Form>
  )
}