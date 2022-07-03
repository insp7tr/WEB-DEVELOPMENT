import "./hotel.css";
import Navbar from "../../components/navbar/Navbar";
import Header from "../../components/header/Header";
import MailList from "../../components/mailList/MailList";
import Footer from "../../components/footer/Footer";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faLocationDot } from "@fortawesome/free-solid-svg-icons";

const Hotel = () => {
  const photos = [
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58184166.jpg?k=77f38fb014955ad67cd40e1652ebe2a9ded05810713aa68ad3bc41e31fd4ebc7&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58184166.jpg?k=77f38fb014955ad67cd40e1652ebe2a9ded05810713aa68ad3bc41e31fd4ebc7&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58184166.jpg?k=77f38fb014955ad67cd40e1652ebe2a9ded05810713aa68ad3bc41e31fd4ebc7&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58184166.jpg?k=77f38fb014955ad67cd40e1652ebe2a9ded05810713aa68ad3bc41e31fd4ebc7&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58184166.jpg?k=77f38fb014955ad67cd40e1652ebe2a9ded05810713aa68ad3bc41e31fd4ebc7&o=&hp=1",
    },
  ];
  return (
    <div>
      <Navbar />
      <Header type="list" />
      <div className="hotelContainer">
        <div className="hotelWrapper">
          <button className="bookNow">Reserve or Book Now!</button>
          <h1 className="hotelTitle">Grand Hotel</h1>
          <div className="hotelAddress">
            <FontAwesomeIcon icon={faLocationDot} />
            <span>OR TAMBO DRIVE</span>
          </div>
          <span className="hotelDistance">
            Excellent Location - 500m from center
          </span>
          <span className="hotelPriceHighlight">
            Book a stay over R8000 at this property and get a free airport taxi
          </span>
          <div className="hotelImages">
            {photos.map((photo) => (
              <div className="hotelImgWrapper">
                <img src={photo.src} alt="" className="hotelImg" />
              </div>
            ))}
          </div>
          <div className="hotelDetails">
            <div className="hotelDetailsTexts">
              <h1 className="hotelTitle">Stay in the heart of durban</h1>
              <p className="hotelDesc">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa
                eveniet, quis illo reprehenderit ut porro necessitatibus
                voluptatum a impedit rerum fugit accusamus omnis ab vel natus
                accusantium neque, modi cum doloribus aliquid! Sed, doloremque
                similique dolores molestiae doloribus tempora perferendis
                necessitatibus magnam eum, expedita veniam non animi ipsa natus.
                Magni.
              </p>
            </div>
            <div className="hotelDetailsPrice">
              <h1>Perfect for a 9-night stay!</h1>
              <span>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro
                doloribus magnam accusantium maxime veritatis blanditiis.
              </span>
              <h2>
                <b>R10000</b> (9 nights)
              </h2>
              <button>Reserve or Book Now!</button>
            </div>
          </div>
        </div>
        <MailList />
        <Footer />
      </div>
    </div>
  );
};

export default Hotel;
