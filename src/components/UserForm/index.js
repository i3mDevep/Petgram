import React, { Fragment } from 'react'
import { useInputValue } from '../../hooks/useInputValue'
import { ImgWrap, Img } from './styles'
import { registerUser } from './Register'
import { loginUser } from './Login'


export const UserForm = ({ onSubmit, error, disable, mode, changeForm }) => {

  //const [mode,setMode] = useState(true)

  const email = useInputValue('')
  const password = useInputValue('')
  const name = useInputValue('')
  const cellphone = useInputValue('')
  const phone = useInputValue('')
  const address = useInputValue('')

  return (
  <Fragment>
    <ImgWrap>
      <Img src= "https://cdn.pixabay.com/photo/2018/05/01/07/47/animal-3364909_960_720.png"/>
    </ImgWrap>
    { mode && loginUser(onSubmit,changeForm, email, password, error, disable) }
    { !mode && registerUser(onSubmit,changeForm, email, password, name, cellphone, phone, address, error, disable ) }
  </Fragment>
  )
}