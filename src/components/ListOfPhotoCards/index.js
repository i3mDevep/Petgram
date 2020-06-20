import React from 'react'
import { PhotoCard } from '../PhotoCard'

export const ListOfPhotoCardsComponents = ( { data: { getPhotos = [] } } ) => {
  console.log(getPhotos)
    return (
      <ul>
        {
          getPhotos.map(photo =>
            <PhotoCard key={ photo.id } id={ photo.id }  { ...photo } />)
        }
      </ul>
    )
}

