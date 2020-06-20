import React from "react";
import { MdFavoriteBorder, MdFavorite } from "react-icons/md";
import { Button } from "./style";

export const FavLikeButton = ({ liked, likes, onClick }) => {
  const Icon = liked ? MdFavorite : MdFavoriteBorder;
  return (
    <Button onClick={onClick}>
      <Icon size="32px" color={liked ? "red" : "black"} /> {likes} likes!
    </Button>
  );
};
