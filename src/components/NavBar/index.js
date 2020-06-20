import React from 'react'
import { Nav,Link } from './style'
import { MdHome, MdFavoriteBorder, MdPersonOutline } from 'react-icons/md'

export const NavBar = () => {
    return (
      <Nav>
        <Link to="/"><MdHome /></Link>
        <Link to="/favs"><MdFavoriteBorder /></Link>
        <Link to="/user"><MdPersonOutline /></Link>
      </Nav>
    )
}