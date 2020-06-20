import React,{ Fragment } from 'react'
import { ImgWrapper, Img } from './styles'
//import { useLocalStorage } from '../../hooks/useLocalStorage'
import { useNearScreen } from '../../hooks/useNearScree'
import { FavLikeButton } from '../FavLikeButton'
import { ToggleLikeMutation } from '../../container/ToggleLikeMutation'
import { Link } from '@reach/router'

const DEFAULT_IMAGE = "https://res.cloudinary.com/midudev/image/upload/w_150/v1555671700/category_fishes.jpg"

export const PhotoCard = ({ id, liked = false, likes = 0, src = DEFAULT_IMAGE }) => {

  //const key = `like-${id}`
  //const [liked, setLiked] = useLocalStorage(key,false)
  const [show,ref] = useNearScreen()

  return (
  <article style={{minHeight:"200px"}} ref = {ref}>
    {show &&
    <Fragment>
      <Link to= {`/detail/${id}`}>
        <ImgWrapper>
          <Img src={src}/>
        </ImgWrapper>
      </Link>
      <ToggleLikeMutation>
        {
          (toogleLike,{data,error,loading}) => {
            const handlerLikeClick = () => {
              toogleLike( { variables: { id } } ).then(({data}) => console.log(data))
            }
            return  <FavLikeButton liked = { liked } likes = { likes }
            onClick = { handlerLikeClick } />
          }
        }
      </ToggleLikeMutation>
    </Fragment>}
  </article>
  )
}