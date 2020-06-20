import React from 'react'
import {Anchor,Image} from "./styles"

const DEFAULT_IMAGE = "https://cdn2.iconfinder.com/data/icons/fruit-nut/512/z3-fruit-coconut-food-512.png"

export const Category = ({cover = DEFAULT_IMAGE, path, emoji = '?' }) => (
    <Anchor to={ path }>
      <Image src={cover}/>
      {emoji}
    </Anchor>
)