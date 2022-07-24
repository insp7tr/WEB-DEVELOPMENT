import useFetch from "../../hooks/useFetch";
import "./featured.css";

const Featured = () => {
  const { data, loading, error } = useFetch(
    "http://localhost:8803/hotels/countByCity?cities=Durban,Pretoria,Johannesburg"
  );

  return (
    <div className="featured">
      {loading ? (
        "Loading please wait..."
      ) : (
        <>
          <div className="featuredItem">
            <img
              src="https://cf.bstatic.com/xdata/images/city/square250/674546.webp?k=f6235dbafae80b1676aa325212985f3ddc1e987a982531853db1dbbc62488c91&o="
              alt=""
            />
            <div className="featuredTitles">
              <h3>Cape Town</h3>
              <h4>0 properties</h4>
            </div>
          </div>
          <div className="featuredItem">
            <img
              src="https://cf.bstatic.com/xdata/images/city/square250/674551.webp?k=b425cb8dc71b64d5c34a8be925940a4ba218c2ae4736aea38519a9672f83001a&o="
              alt=""
            />
            <div className="featuredTitles">
              <h3>Durban</h3>
              <h4>{data[0]} properties</h4>
            </div>
          </div>
          <div className="featuredItem">
            <img
              src="https://cf.bstatic.com/xdata/images/city/square250/674692.webp?k=ee80cb27264ea18e5f683c94c90fd8db9bb61c93c10bbe06a15ea67d9498675f&o="
              alt=""
            />
            <div className="featuredTitles">
              <h3>Pretoria</h3>
              <h4>{data[1]} properties</h4>
            </div>
          </div>
          <div className="featuredItem">
            <img
              src="https://cf.bstatic.com/xdata/images/city/square250/674616.webp?k=0b800c96e92f7cbd5f0b86d9bff427379cfcd4ecb5ef36546d3330353daf1307&o="
              alt=""
            />
            <div className="featuredTitles">
              <h3>Johannesburg</h3>
              <h4>{data[2]} properties</h4>
            </div>
          </div>
          <div className="featuredItem">
            <img
              src="https://cf.bstatic.com/xdata/images/region/square250/60973.webp?k=057ed288c0c9525979a01d0d993911ab337768e1a2286a71a7ae0b0a8378ed65&o="
              alt=""
            />
            <div className="featuredTitles">
              <h3>Drakensburg</h3>
              <h4>0 properties</h4>
            </div>
          </div>
        </>
      )}
    </div>
  );
};

export default Featured;
