function Index(){

    const [tasks, setTasks] = React.useState([]);

    React.useEffect(() => {
      axios.get("http://127.0.0.1:8000/api/task").then((res) => {
        setTasks(res.data);
      });
    }, []);

    const onDelete = (id) => {
      axios.delete(`http://127.0.0.1:8000/api/task/${id}`)
      .then(() => {
        window.location.reload(false);
          console.log('done');
      })
    }


    return (
      <div className="container">
      <div className='row justify-content-center'>
          <div className='hero'>
          <form action="" method="POST">
                <div className="input-group mb-3">
                  <input type="text" className="form-control" name="task" />
                  <input type="submit" className="add" value="submit" name="submit" />
                </div>
            </form>
            <table className="table" key={Math.random()}>
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col" className="end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                {tasks.map(task =>   
                  <tr>
                    <td>{task.name}</td>
                    <td><button className="btn btn-danger" onClick={() => onDelete(task.id)}>Delete</button> </td>
                  </tr>
                  )}
                </tbody>
            </table>
          </div>
      </div>
    </div>
    //     <div>
    //     <div>hey 
    //     </div>
    // </div>
        );
}
// export default Index