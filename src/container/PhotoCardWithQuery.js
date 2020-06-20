import React from 'react'
import { PhotoCard } from '../components/PhotoCard'

import { gql } from 'apollo-boost'
import { Query } from 'react-apollo'

const GET_SINGLE_PHOTOS = gql`
query GET_SINGLE_PHOTOS($id : Int!){
    getSinglePhotos (id:$id){
      id,
      categoryid,
      src,
      userid,
      likes
    }
  }
`
const renderProps = ( { data, error, loading} ) => {
  if (loading) return "Loading..."
  if ( error ) return "Error"
  const { getSinglePhotos = { } } = data
    return ( <PhotoCard { ...getSinglePhotos }/> )
}
export const PhotoCardWithQuery = ( { id } ) => (
    <Query query={ GET_SINGLE_PHOTOS } variables = { { id } }>
        { renderProps }
    </Query>
)