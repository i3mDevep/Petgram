import { keyframes , css } from 'styled-components'

const fadeInKeyframes = keyframes`
  0% {
    transform: rotateY(0deg);
  }
  50% {
    transform: rotateY(-90deg);
  }
  100% {
    transform: rotateY(0deg);
  }
`
export const rotationIn = ({ time = '1s' , type = 'ease' } = {}) =>
    css`animation:${time} ${fadeInKeyframes} ${type};`