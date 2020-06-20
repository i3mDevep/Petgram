import styled from 'styled-components'
import { rotationIn } from '../../../styles/animation2'

export const Changeform = styled.a`
  color: blue;
  text-decoration-line: underline;
  cursor: pointer;
`
export const Error = styled.span`
  font-size: 14px;
  color: red;
  padding: 8px;
`
export const Form = styled.form`
  /* ${ rotationIn() } */
  display: flex;
  flex-direction:column;
  width: 80%;
  text-align: center;
  justify-content: center;
  padding: 10px;
  margin: 0 auto;
  border-radius: 10px;
  -webkit-box-shadow: 0px 3px 20px -8px rgba(0,0,0,0.75);
  -moz-box-shadow: 0px 3px 20px -8px rgba(0,0,0,0.75);
  box-shadow: 0px 3px 20px -8px rgba(0,0,0,0.75);
  & h1 {
      color: #6b48ff;
  }
  & input {
      width: 100%;
      padding: 15px;
      border: none;
      border-bottom: 1px solid #fddede;
      & [disabled] {
      opacity: .3;
      }
  }
  & input:focus {
    background-color: #f3f9fb;
    outline: none;
    border-bottom: 3px solid #32ff6a;
  }
  & button {
      background-image: linear-gradient(to left, #b824a4,#560764);
      padding: 15px;
      color: white;
      font-size: 15px;
      border-radius: 17px;
      margin: 50px auto 15px auto;
      & [disabled] {
      opacity: .3;
      }
  }
  & label {
    & [disabled] {
      opacity: .3;
    }
  }
  & [disabled] {
    opacity: .3;
  }
`