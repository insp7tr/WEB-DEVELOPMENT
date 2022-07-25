import React from "react";
import styled from "styled-components";
import { themeColor } from "../utils";

function Badge({ content }: any) {
  return <Div>{content}</Div>;
}

const Div = styled.span`
  padding: 0.3rem 0.7rem;
  border-radius: 1rem;
  font-weight: 500;
  color: white;
  background-color: ${themeColor};
  cursor: pointer;
`;

export default Badge;
