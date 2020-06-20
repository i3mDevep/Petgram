import { graphql } from 'react-apollo'
import { gql } from 'apollo-boost'

export const withPhotos = graphql(gql`
query GET_PHOTOS( $categoryId: Int) {
  getPhotos(categoryid: $categoryId) {
    id,
    categoryid,
    src,
    userid,
    likes,
    liked
  }
}
`)