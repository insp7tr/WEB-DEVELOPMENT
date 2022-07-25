import React from "react";
import styled from "styled-components";
import Earnings from "./Earnings";
import Info from "./info";
import Navbar from "./Navbar";
import Projects from "./Projects";

function MainContent() {
  return (
    <Container>
      <Navbar />
      <SubContainer>
        <SectionOne>
          <ColumnOne1>
            <Earnings />
            <Info />
          </ColumnOne1>
          <ColumnTwo1>
            <TitleText>Your Projects</TitleText>
            <Projects />
          </ColumnTwo1>
        </SectionOne>
        <SectionTwo>
          <ColumnOne2></ColumnOne2>
          <ColumnTwo2></ColumnTwo2>
        </SectionTwo>
      </SubContainer>
    </Container>
  );
}

const Container = styled.div`
  width: 80%;
  background: linear-gradient(to bottom right, white 0%right, #e6e4ff 70%);
  border-bottom-right-radius: 2rem;
  border-top-right-radius: 2rem;
  margin: 1rem 8rem 1rem 4rem;
`;

const SubContainer = styled.div`
  margin: 0.5rem 0;
  height: 80%;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 4rem;
`;

const TitleText = styled.h3`
  height: 20%;
`;
const SectionOne = styled.div`
  display: flex
  justify-content: space-between;
  height: 40%;
  gap: 2rem;
  width: 100%;
`;

const ColumnOne1 = styled.div`
  display: flex;
  gap: 3rem;
`;

const ColumnTwo1 = styled.div`
  display: flex;
  flex-direction: column;
  height: 115%;
  width: 100$;
`;

const SectionTwo = styled.div`
  display: flex;
  gap: 2rem;
  height: 26vh;
`;

const ColumnOne2 = styled.div``;

const ColumnTwo2 = styled.div``;

export default MainContent;
