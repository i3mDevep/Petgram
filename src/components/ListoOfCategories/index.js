import React, { Fragment, useEffect, useState } from 'react'
import { Category } from '../Category'
import { List, Item } from "./styles"
import { categories } from '../../../api/db.json'

export const ListOfCategories = () => {
  const [showCategories,setShowCategories] = useState(false)
    useEffect(() => {
      const onScroll = e => {
        const newShowFixed = scrollY > 200
        showCategories !== newShowFixed && setShowCategories(newShowFixed)
      }
      document.addEventListener('scroll',onScroll)
      return () => document.removeEventListener('scroll',onScroll)
    },[showCategories])

    const renderList = (fixed) => (
      <List fixed = { fixed }>
      {
        categories.map(category => <Item key={category.id}><Category  {...category} path = {`/pet/${category.id}`} /></Item>)
      }
      </List>
    )
    return (
      <Fragment>
        {renderList()}
        {showCategories && renderList(true)}
      </Fragment>
    )
}