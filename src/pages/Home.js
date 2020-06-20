import React, { Fragment } from 'react'

import { ListOfCategories } from '../components/ListoOfCategories'
import { ListOfPhotoCards } from '../container/ListOfPhotoCards'

export const Home = ({ id }) => {
  return (
    <Fragment>
      <ListOfCategories />
      <ListOfPhotoCards categoryId = { id } />
    </Fragment>
  )
}